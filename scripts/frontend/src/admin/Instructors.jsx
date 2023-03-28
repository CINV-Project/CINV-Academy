import { h } from 'preact';
import Sidebar from '../Sidebar';
import DataTable from 'react-data-table-component';
import { getInstructors } from '../utils';
import { useEffect, useState } from 'preact/hooks';

const columns = [
  {
    name: 'First Name',
    selector: row => row.firstname,
  },
  {
    name: 'Last Name',
    selector: row => row.lastname,
  },
  {
    name: 'Email',
    selector: row => row.email,
    grow: 2,
  },
  {
    name: 'Courses Taught',
    selector: row => row.instructors.courses.join(', '),
    wrap: true,
  },
];

export const AdminDashboardInstructors = ({ role }) => {
  const [data, setData] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      const result = await getInstructors();
      setData(result);
    };

    fetchData();
  }, []);

  return (
    <div class="tw-flex">
      <div className="tw-w-[300px]">
        <Sidebar />
      </div>
      <div className="tw-w-full">
        <h2>Instructor List</h2>
        <DataTable
          columns={columns}
          data={data}
          selectableRows
        />
      </div>
    </div>
  );
};
