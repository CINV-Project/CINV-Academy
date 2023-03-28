
import { h } from 'preact';
import Sidebar from '../Sidebar';
import DataTable from 'react-data-table-component';
import { getStudents } from '../utils';
import { useEffect, useState } from 'preact/hooks';

const columns = [
  {
    name: '',
    cell: row => <img class="tw-w-[32px] tw-h-[32px] tw-rounded-full" src={row.avatar} />,
    width: '64px',
  },
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
];

export const AdminDashboardStudent = ({ role }) => {
  const [data, setData] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      const result = await getStudents();
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
        <h2>Student List</h2>
        <DataTable
          columns={columns}
          data={data}
          selectableRows
        />
      </div>
    </div>
  );
};
