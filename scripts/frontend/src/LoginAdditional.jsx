import { h } from 'preact';
import { useState } from 'preact/compat';

import OutlinedInput from '@mui/material/OutlinedInput';
import Box from '@mui/material/Box';
import InputLabel from '@mui/material/InputLabel';
import MenuItem from '@mui/material/MenuItem';
import FormControl from '@mui/material/FormControl';
import Select from '@mui/material/Select';
import Chip from '@mui/material/Chip';
import Button from '@mui/material/Button';
import { completeRegistration, createInstructor } from './utils';

const handleRegister = async (instructorState) => {
  await createInstructor(instructorState);
  await completeRegistration('instructor');
  window.location = '/dashboard/instructors';
}

const days = [
  'Monday',
  'Tuesday',
  'Wednesday',
  'Thursday',
  'Friday',
  'Saturday',
  'Sunday',
];

const courseList = [
  'Biology',
  'Chemistry',
  'Physics',
  'Mathematics',
  'English',
  'French',
  'Spanish',
  'German',
];

const defaultState = {
  courses: [],
  education: '',
  experience: '',
  daysOfWeek: [],
};


export const LoginAdditional = () => {
  const [formState, setFormState] = useState(defaultState);

  const handleInputChange = (event) => {
    const target = event.target;
    const value = target.type === 'checkbox' ? target.checked : target.value;
    const name = target.name;

    setFormState((prevState) => ({ ...prevState, [name]: value }));
  };

  const { courses, daysOfWeek, experience, education } = formState;
  console.log('formState', formState);

  return (
    <div class="">
      <h2>Additional Information</h2>
      <div class="tw-mb-[24px]">We require some additional information to complete your registration as a "Teacher". </div>
      <div class="tw-flex tw-flex-col ">
        <FormControl sx={{ m: 1, width: 300 }}>
          <InputLabel id="courses-label">Courses</InputLabel>
          <Select
            labelId="courses-label"
            id="courses"
            name="courses"
            multiple
            value={courses}
            onChange={handleInputChange}
            input={<OutlinedInput id="select-courses" label="Courses" />}
            renderValue={(selected) => (
              <Box sx={{ display: 'flex', flexWrap: 'wrap', gap: 0.5 }}>
                {selected.map((value) => (
                  <Chip key={value} label={value} />
                ))}
              </Box>
            )}
            MenuProps={{ PaperProps: { style: { maxHeight: 224, width: 250, } } }}
          >
            {courseList.map((course) => (<MenuItem key={course} value={course}>{course}</MenuItem>))}
          </Select>
        </FormControl>
        <FormControl sx={{ m: 1, width: 300 }}>
          <InputLabel id="education-label">Highest Level of Education</InputLabel>
          <Select
            labelId="education-label"
            id="education-select"
            value={education}
            label="Highest Level of Education"
            name="education"
            onChange={handleInputChange}
          >
            <MenuItem value={10}>Ten</MenuItem>
            <MenuItem value={20}>Twenty</MenuItem>
            <MenuItem value={30}>Thirty</MenuItem>
          </Select>
        </FormControl>
        <FormControl sx={{ m: 1, width: 300 }}>
          <InputLabel id="experience-label">Experience</InputLabel>
          <Select
            labelId="experience-label"
            id="experience-select"
            value={experience}
            label="Experience"
            name="experience"
            onChange={handleInputChange}
          >
            <MenuItem value={10}>Ten</MenuItem>
            <MenuItem value={20}>Twenty</MenuItem>
            <MenuItem value={30}>Thirty</MenuItem>
          </Select>
        </FormControl>
        <FormControl sx={{ m: 1, width: 300 }}>
          <InputLabel id="daysOfWeek-label">Days Of Week</InputLabel>
          <Select
            labelId="daysOfWeek-label"
            id="daysOfWeek"
            name="daysOfWeek"
            multiple
            value={daysOfWeek}
            onChange={handleInputChange}
            input={<OutlinedInput id="select-daysOfWeek" label="Days Of Week" />}
            renderValue={(selected) => (
              <Box sx={{ display: 'flex', flexWrap: 'wrap', gap: 0.5 }}>
                {selected.map((value) => (
                  <Chip key={value} label={value} />
                ))}
              </Box>
            )}
            MenuProps={{ PaperProps: { style: { maxHeight: 224, width: 250, } } }}
          >
            {days.map((day) => (<MenuItem key={day} value={day}>{day}</MenuItem>))}
          </Select>
        </FormControl>
        <FormControl sx={{ m: 1, width: 300 }}>
          <Button variant="contained" size="large" onClick={() => handleRegister(formState)}>
            Register
          </Button>
        </FormControl>
      </div>
    </div >
  )
}