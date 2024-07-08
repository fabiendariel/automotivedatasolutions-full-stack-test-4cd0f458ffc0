import React from 'react'; 
import { useState, useEffect } from 'react';

type resultProps = {
  name: string;
};

export default function VehicleMake(vehicleMakeId: number) => {
  const [result, setResult] = useState<resultProps[]>([]);
  useEffect(() => {
    const api = async (vehicleMakeId: number) => {
      const data = await fetch("https://localhost/api/vehicle-makes/" + vehicleMakeId, {
        method: "GET"
      });
      const jsonData = await data.json();
      setResult(jsonData.results);
    };

    api();
  }, []);
  return (
    <div>
      {result.map((value) => {
        return (
          {value.name}
        );
      })}
    </div>
  );
}