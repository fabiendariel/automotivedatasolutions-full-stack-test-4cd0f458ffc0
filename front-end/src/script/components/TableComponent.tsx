import React from 'react';

const TableComponent = ({ vehicleMake, vehicleYears, vehicleModels, vehicleDatas }) => {
  const headers = Object.keys(data[0]);
  const rows = data.map(item => Object.values(item));

  return (
    <table>
      <thead>
        <tr>
          {headers.map(header => <th key={header}>{header}</th>)}
        </tr>
      </thead>
      <tbody>
        {rows.map((row, index) => (
          <tr key={index}>
            {row.map((cell, index) => <td key={index}>{cell}</td>)}
          </tr>
        ))}
      </tbody>
    </table>
    /*
export const App: React.FC = () => 
  <table>
    <tr>
      <td>{VehicleMake}</td>
      {VehicleYears.map(VehicleYear => (
        <YearColumn key={VehicleYear.year} />
      ))}
    </tr>
    {VehicleModels.map(VehicleModel => (
      <VehicleModelLine key={VehicleYear.year} />
    ))}
    <tr>
      <td>Modele</td>
      <td></td>
      <td className="stated"></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td className="stated"></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>Modele</td>
      <td></td>
      <td></td>
      <td className="stated"></td>
      <td className="stated"></td>
      <td className="stated"></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>Modele</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td className="stated"></td>
      <td className="stated"></td>
      <td className="stated"></td>
    </tr>
    <tr>
      <td>Modele</td>
      <td className="stated"></td>
      <td className="stated"></td>
      <td className="stated"></td>
      <td className="stated"></td>
      <td className="stated"></td>
      <td className="stated"></td>
      <td className="stated"></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>Modele</td>
      <td></td>
      <td></td>
      <td className="stated"></td>
      <td className="stated"></td>
      <td className="stated"></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>Modele</td>
      <td className="stated"></td>
      <td className="stated"></td>
      <td className="stated"></td>
      <td className="stated"></td>
      <td className="stated"></td>
      <td className="stated"></td>
      <td className="stated"></td>
      <td className="stated"></td>
      <td className="stated"></td>
    </tr>
    <tr>
      <td>Modele</td>
      <td className="stated"></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </table>
;*/
  );
};

export default TableComponent;