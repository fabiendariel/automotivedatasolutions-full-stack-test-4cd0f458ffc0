import React from 'react';

const TableComponent = ({ Array: vehicleMake, Array: vehicleYears, Array: vehicleList  }) => {
  const years = vehicleYears.map(item => Object.values(item));
  const vehicules = vehicleList[vehicleMake.id]['coverage'].map(item => Object.values(item));

  return (  

  <table>
    <tr>
        <td>{vehicleMake.name}</td>
        {years.map((year) => (
          <td key={year}>{year}</td>       
        ))}
    </tr>
      
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

  );
};

export default TableComponent;