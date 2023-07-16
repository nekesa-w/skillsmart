<?php

namespace App\Controllers;

use App\Models\CompletedLevelModel;
use App\Models\CourseXPModel;
use App\Models\LevelModel;
use App\Models\QuestionsModel;
use App\Models\UserModel;

class QuestionController extends BaseController
{
    function getcontent()
    {
        $page = 1;
        $level_id = $this->request->getPost('get_content');
        return redirect()->to(base_url() . 'level_content/' . $level_id . '/' . $page);
    }

    public function level_content()
    {
        $uri = current_url(true);
        $level_id = $uri->getSegment(2);
        $page = $uri->getSegment(3);

        $levelModel = new LevelModel();
        $level_details = $levelModel->LevelContent($level_id);

        $questionsModel = new QuestionsModel();

        $data = [
            'questions' => $questionsModel->where('level_id', $level_id)->paginate(1, 'group1'),
            'pager' => $questionsModel->pager,
            'currentPage' => $questionsModel->pager->getCurrentPage('group1'),
            'totalPages'  => $questionsModel->pager->getPageCount('group1'),
            'level_details' => $level_details,
            'level_id' => $level_id
        ];

        return view('main/level_content', $data);
    }

    function markcomplete()
    {
        $level_id = $this->request->getPost('mark_complete');
        $user_id = session()->get('user_id');

        $getlevel = new LevelModel();
        $data = $getlevel->MarkComplete($level_id, $user_id);

        $course_id = ($data['0']['course_id']);
        $xp_gained = '100';

        $userxp = new UserModel();
        $find_user_xp = $userxp->where('user_id', $user_id)->findAll();

        if (count($find_user_xp) > 0) {

            $coursexp = new CourseXPModel();
            $find_course_xp = $coursexp->where('course_id', $course_id)->where('user_id', $user_id)->findAll();
            $old_course_xp_point = $find_course_xp[0]['xp_points'];
            $new_course_xp_point = $old_course_xp_point + $xp_gained;

            $course_xp_id = $find_course_xp[0]['course_xp_id'];
            $course_data['xp_points'] = $new_course_xp_point;
            $updatecoursexp = $coursexp->update($course_xp_id, $course_data);

            $old_level_xp_point = $find_user_xp[0]['xp_points'];
            $new_level_xp_point = $old_level_xp_point + $xp_gained;

            $level_data['xp_points'] = $new_level_xp_point;
            $updatelevelxp = $userxp->update($find_user_xp[0]['user_id'], $level_data);

            $currentdailyxp = $find_user_xp[0]['daily_xp_points'];
            $old_daily_xp_point = $find_user_xp[0]['daily_xp_points'];
            $new_daily_xp_point = $old_daily_xp_point + $xp_gained;

            $updatedailyxp = $userxp->updateXpPoints($user_id, $new_daily_xp_point);

            $data['user'] = $userxp->UserDetailsbyId($user_id);
            $dailyxp = $data['user'][0]['daily_xp_points'];
            session()->set('daily_xp_points', $dailyxp);

            $values = [
                'user_id' => $user_id,
                'course_id' => $course_id,
                'level_id' => $level_id,
                'xp_points' => $xp_gained
            ];

            $marklevelcomplete = new CompletedLevelModel();
            $query = $marklevelcomplete->insert($values);

            $newuserxp = session()->set('xp_points', $new_level_xp_point);

            $completedlevels = $userxp->CompletedLevelsUserCount($user_id);
            session()->set('complete_levels', $completedlevels);

            return redirect()->to('courses')->with('success', 'Success! Level marked complete!');
        } else {
            return  redirect()->to('courses')->with('fail', 'Something went wrong. Level not marked complete.');
        }
    }
}