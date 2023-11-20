<?php
session_start();

require 'components/header.php';

// echo '<pre>'; var_dump($_SESSION); echo '</pre>';
?>

<section class="container py-5">
    <div class="row">
        <div class="col">
            <h1 class="text-center mb-3">Results</h1>
            <div class="px-5">
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="col">
            <p>Dear <?php echo ($_SESSION['first_name']) . ' ' . $_SESSION['last_name']; ?>,</p>
            <p>Here is the result of your Qualifying Examination:</p>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="card-title">
                        <h2><?php echo $_SESSION['score']; ?></h2>
                    </div>
                    <div class="card-subtitle">
                        Raw Score
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="card-title">
                        <h2 id="correct-percentage"></h2>
                    </div>
                    <div class="card-subtitle">
                        Correct Answer
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="card-title">
                        <h2 id="incorrect-percentage"></h2>
                    </div>
                    <div class="card-subtitle">
                        Incorrect Answer
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Calculate Percentages -->
<script>
    const correctPercentage = <?php echo ($_SESSION['score'] / 10) * 100; ?>;
    const incorrectPercentage = <?php echo ((10 - $_SESSION['score']) / 10) * 100; ?>;
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelector("h2#correct-percentage").innerHTML = `${correctPercentage}%`;
        document.querySelector("h2#incorrect-percentage").innerHTML = `${incorrectPercentage}%`;
    })
</script>

<!-- PIE CHART -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Correct', 'Incorrect'],
      datasets: [{
        // label: '# of Votes',
        data: [`${correctPercentage}`, `${incorrectPercentage}`],
        borderWidth: 1,
        backgroundColor: ['#66CDAA', '#B22222']
      }]
    }
  });
</script>


<?php
require 'components/footer.php';
?>