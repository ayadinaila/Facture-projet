
<div class="grid-container">

    <div class="item1 grid">

        <div class="project-number">
            <div class="facture">
                <h4>Facture</h4>
                <h5 >{{ $facture }}</h5>
            </div>
            <div class="line"></div>
            <div class="proforma">
                <h4>Proforma</h4>
                <h5 >{{ $proforma }}</h5>
            </div>
        </div>

    </div>

    <div class="item2 grid">
        <h4>Projects Earning</h4>
        <div class="project-earning">


            <div class="facture">
                <h5>Facture</h5>
                <h6 style="color: #8BBCCC">{{ $pricefacture }} Da</h6>
            </div>
            <div class="line"></div>
            <div class="proforma">
                <h5>Proforma </h5>
                <h6 style="color: #8BBCCC">{{ $priceproforma }} Da</h6>
            </div>
        </div>

    </div>

    <div class="item3 grid" >
        <h4>Active Projects</h4>
        <h5 > {{ $projects }}</h5>


    </div>

        <div id='chart' style="background-color:aliceblue;"></div>
   

<script>




    var options = {
          series: [{
          name: 'Facture',
          data: {!! $countfact !!}
        }, {
          name: 'Proforma',

          data: {!! $countprof !!}
        }],
          chart: {
          height: 350,
          type: 'area'
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'datemonth',
          categories: {!! $monthsprof !!}
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();



</script>

</div>
