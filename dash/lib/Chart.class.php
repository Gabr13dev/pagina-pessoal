<?php
/*
*
*
*/

class Chart {
    public $chartType,$data;

    function __construct($type,$values = [],$names = [],$nameId)
    {
        $this->chartType = $type;
        $this->data = $values;
        $this->names = $names;
        $this->nameId = $nameId;
    }

    private function initChartDependences(){
        echo "<style>";
        echo file_get_contents(BASE_URL.'/css/Chart.min.css');
        echo "</style>";
        echo "<script>";
        echo file_get_contents(BASE_URL.'/js/Chart.min.js');
        echo "</script>";
    }

    private function transformArray($data,$index,$separate = ""){
        $limiter = count($data) - 1;
        $out = "[";
        foreach($data as $key => $array){
            $out .= $separate. $array[$index] .= ($key != $limiter ? $separate.",":"");
        }
        $out .= $separate."]";
        return $out;
    }

    public function createChartFollowers(){
        $this->initChartDependences();
        $chart = [];

        echo "<canvas id='".$this->nameId."' width='600px' height='200px'></canvas>
        <script>
        var ctx = document.getElementById('".$this->nameId."').getContext('2d');
        var myChart = new Chart(ctx, {
            type: '".$this->chartType."',
            data: {
                labels: ".$this->names.",
                datasets: [{
                    label: 'Evolução de seguidores',
                    data: ".$this->data.",
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(232, 32, 32, 0.7)',
                        'rgba(17, 214, 47, 0.7)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        </script>";
    }
}