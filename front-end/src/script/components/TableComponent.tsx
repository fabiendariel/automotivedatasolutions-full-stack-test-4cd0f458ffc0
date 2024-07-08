import React from 'react';

const TableComponent = ({ vehicleMake, vehicleYears  }) => {
  const years = vehicleYears.map(item => Object.values(item));
  //const vehicules = vehicleList[vehicleMake.id]['coverage'].map(item => Object.values(item));

  return (  

  <table>
    <tr>
        <td>{vehicleMake.name}</td>
        {years.map((year) => (
          <td key={year}>{year}</td>       
        ))}
    </tr>
    <tr>
        <td>ILX</td>
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
        <td>MDX</td>
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
        <td>RDX</td>
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
        <td>RLX</td>
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
        <td>TL</td>
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
        <td>TLX</td>
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
        <td>TSX</td>
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