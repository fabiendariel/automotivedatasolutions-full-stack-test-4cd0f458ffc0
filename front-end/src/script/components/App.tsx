import * as React from 'react';
import TableComponent from './TableComponent';
import { useState, useEffect } from 'react';

/*
const vehicleMake = () => {
  const [photos, setPhotos] = useState([]);
  useEffect(() => {
    fetch('https://localhost/api/vehicle-makes')
      .then((res) => {
        return res.json();
      })
      .then((data) => {
        console.log(data);
        setPhotos(data);
      });
  }, []);
*/
const vehicleMake = [
  { id: 1, name: 'Acura', url: 'https://www.acura.ca' }
];

const vehicleYears = [
  '2018', '2017', '2016', '2015', '2014', '2013', '2012', '2011', '2010'
];

const vehicleModels = [
  { id: 903, name: 'ILX' },
  { id: 2, name: 'vMDX' },
  { id: 606, name: 'RDX' },
  { id: 986, name: 'RLX' },
  { id: 6, name: 'TL' },
  { id: 1087, name: 'TLX' },
  { id: 7, name: 'TSX' }
];
/*
const vehicleList = [
  { id: 1, data: [
    { id: 903, data: ['2018', '2017', '2016'] }
];
*/
export const App: React.FC = () => {
  return (
    <div>
      <TableComponent vehicleMake={vehicleMake} vehicleYears={vehicleYears} vehicleModels={vehicleModels} />
    </div>
  );
}