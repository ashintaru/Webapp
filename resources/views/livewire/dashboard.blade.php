<div>
    @include('layouts.headerAdmin')
    <div class="container p-2">
      <div class="row">
        <div class="col-3">
          <div class="date-card">
            <div class="month">{{Carbon\Carbon::today()->format('l')}}</div>
            <div class="day">{{Carbon\Carbon::today()->format('d')}}</div>
            <div>
               <div class="month">{{Carbon\Carbon::today()->format('F')}}</div>
              <div class="year">{{Carbon\Carbon::today()->format('Y')}}</div>
            </div>
          </div>   
          <br>
          <div class="date-card">            
            <div class="day">{{$totalJob}}</div>
            <div>
               <div class="month">Total</div>
              <div class="year">Job Post</div>
            </div>
          </div>
          <BR>
          <div class="date-card">            
            <div class="day">{{$totalMessage}}</div>
            <div>
               <div class="month">Total</div>
              <div class="year">message Recieve</div>
            </div>
          </div>   
        </div>     
        <div class="col-9">
          {{-- <div class="header">
            <h1>Reliable, efficient delivery</h1>
            <h1>Powered by Technology</h1>
        
            <p>Our Artificial Intelligence powered tools use millions of project data points
              to ensure that your project is successful</p>
          </div> --}}
          <div class="row1-container">
            <div class="box box-down cyan">
              <h2>Company</h2>
              <p>Monitors activity to identify project roadblocks</p>
              <img src="https://assets.codepen.io/2301174/icon-supervisor.svg" alt="">
            </div>
        
            <div class="box red">
              <h2>Job</h2>
              <p>The System Post </p>
              <img src="https://assets.codepen.io/2301174/icon-team-builder.svg" alt="">
            </div>
        
            <div class="box box-down blue">
              <h2>Events</h2>
              <p>Uses data from past projects to provide better delivery estimates</p>
              <img src="https://assets.codepen.io/2301174/icon-calculator.svg" alt="">
            </div>
          </div>
          <div class="row2-container">
            <div class="box orange">
              <h2>Message</h2>
              <p>Regularly evaluates our talent to ensure quality</p>
              <img src="https://assets.codepen.io/2301174/icon-karma.svg" alt="">
            </div>
          </div>
        </div>   
      </div>

      <div class="row">
  
      </div>

    </div>
{{-- The best athlete wants his opponent at his best. --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
var ctx = document.getElementById("dashboardChart");
        var dashboardChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Red", "Orange", "Green"],
            datasets: [{
                label: '# of Votes',
                data: [33, 33, 33],
                backgroundColor: [
                    'rgba(231, 76, 60, 1)',
                    'rgba(255, 164, 46, 1)',
                    'rgba(46, 204, 113, 1)'
                ],
                borderColor: [
                    'rgba(255, 255, 255 ,1)',
                    'rgba(255, 255, 255 ,1)',
                    'rgba(255, 255, 255 ,1)'
                ],
                borderWidth: 5
            }]

        },
        options: {
            rotation: 1 * Math.PI,
            circumference: 1 * Math.PI,
            legend: {
                display: false
            },
            tooltip: {
                enabled: false
            },
            cutoutPercentage: 95
        }
    });

// var ctx1 = document.getElementById("dashboardChart");
    
// var dashboardChart2 = new Chart(ctx1,config);
//     const config = {
//         type: 'bar',
//         data,
//         options: {
//             indexAxis: 'y',
//         }
//     };
new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [2478,5267,734,784,433]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});

</script>
<style>
  .date-card{
  border:1px solid #ddd;
  width:200px;
  padding:10px;
  display:flex;
  align-items:center;
}

.date-card .day{
  font-size:48px;
  margin:0px 10px;
  color:#2ab6b6;
}

.date-card .month{
  font-weight:bold;
}


/*  */
:root {
    --red: hsl(0, 78%, 62%);
    --cyan: hsl(180, 62%, 55%);
    --orange: hsl(34, 97%, 64%);
    --blue: hsl(212, 86%, 64%);
    --varyDarkBlue: hsl(234, 12%, 34%);
    --grayishBlue: hsl(229, 6%, 66%);
    --veryLightGray: hsl(0, 0%, 98%);
    --weight1: 200;
    --weight2: 400;
    --weight3: 600;
}

body {
    font-size: 15px;
    font-family: 'Poppins', sans-serif;
    background-color: var(--veryLightGray);
}

.attribution { 
    font-size: 11px; text-align: center; 
}
.attribution a { 
    color: hsl(228, 45%, 44%); 
}

h1:first-of-type {
    font-weight: var(--weight1);
    color: var(--varyDarkBlue);

}

h1:last-of-type {
    color: var(--varyDarkBlue);
}

@media (max-width: 400px) {
    h1 {
        font-size: 1.5rem;
    }
}

.header {
    text-align: center;
    line-height: 0.8;
    margin-bottom: 50px;
    margin-top: 100px;
}

.header p {
    margin: 0 auto;
    line-height: 2;
    color: var(--grayishBlue);
}


.box p {
    color: var(--grayishBlue);
}

.box {
    border-radius: 5px;
    box-shadow: 0px 30px 40px -20px var(--grayishBlue);
    padding: 30px;
    margin: 20px;  
}

img {
    float: right;
}

@media (max-width: 450px) {
    .box {
        height: 200px;
    }
}

@media (max-width: 950px) and (min-width: 450px) {
    .box {
        text-align: center;
        height: 180px;
    }
}

.cyan {
    border-top: 3px solid var(--cyan);
}
.red {
    border-top: 3px solid var(--red);
}
.blue {
    border-top: 3px solid var(--blue);
}
.orange {
    border-top: 3px solid var(--orange);
}

h2 {
    color: var(--varyDarkBlue);
    font-weight: var(--weight3);
}


@media (min-width: 950px) {
    .row1-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .row2-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .box-down {
        position: relative;
        top: 150px;
    }
    .box {
        width: 20%;
     
    }
    .header p {
        width: 30%;
    }
    
}

</style>
</div>

