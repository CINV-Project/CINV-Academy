import { h } from 'preact';
import { route } from 'preact-router';
import { completeRegistration } from './utils';


const handleClick = async (role) => {
  console.log(role);
  let destination = '/404';
  if (role == 'student') {
    await completeRegistration('student');
    window.location = `/dashboard/${role}`;
  } else if (role == 'teacher') {
    route('/login/additional');
  }
}

export const LoginType = () => {
  return (
    <div class="">
      <h2>Join CINV Academy As</h2>
      <div class="tw-mb-[24px]">Please select your account type, "Student" or "Teacher". </div>
      <div class="tw-flex tw-space-x-[16px] ">
        <div onClick={() => handleClick('student')} class="tw-p-[16px] tw-shadow tw-cursor-pointer tw-rounded tw-w-[300px] tw-h-[300px] tw-bg-white tw-border-solid tw-border-[1px] tw-border-white hover:tw-border-accent-blue hover:tw-shadow-none">
          <h3 class="tw-text-center tw-mb-[32px] tw-mt-0 tw-py-[32px] tw-border-solid tw-border-0 tw-border-gray-200 tw-border-b-[1px]">Student</h3>
          <p>description of a student here</p>
        </div>

        <div onClick={() => handleClick('teacher')} class="tw-p-[16px] tw-shadow tw-cursor-pointer tw-rounded tw-w-[300px] tw-h-[300px] tw-bg-white tw-border-solid tw-border-[1px] tw-border-white hover:tw-border-accent-blue hover:tw-shadow-none">
          <h3 class="tw-text-center tw-mb-[32px] tw-mt-0 tw-py-[32px] tw-border-solid tw-border-0 tw-border-gray-200 tw-border-b-[1px]">Teacher</h3>
          <p>description of a teacher here</p>
        </div>
      </div>
    </div>
  )
}