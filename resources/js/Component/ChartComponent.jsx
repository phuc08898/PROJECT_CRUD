import React, { useEffect, useRef } from 'react';
import { Chart } from 'chart.js';


const ChartComponent = () => {
    const chartRef = useRef(null);


    useEffect(() => {
        const ctx = chartRef.current.getContext('2d');
        new Chart(ctx, {
            type: 'bar', // Loại biểu đồ: bar, line, pie, etc.
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'My First dataset',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 10, 5, 2, 20, 30, 45],
                }]
            },
            options: {}
        });
    }, []);


    return <canvas ref={chartRef} />;
};


export default ChartComponent;

