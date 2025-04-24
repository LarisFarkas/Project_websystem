<div class="container mt-5">
  <h2 class="mb-4">Dashboard Overview</h2>
  <div class="row mb-4 text-center">
    <div class="col-md-4 mb-3">
      <div class="card shadow-sm bg-primary text-white">
        <div class="card-body">
          <h5 class="card-title">Total Users</h5>
          <h3><?= $dashboardData['totals']['users'] ?></h3>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card shadow-sm bg-danger text-white">
        <div class="card-body">
          <h5 class="card-title">Total Incidents</h5>
          <h3><?= $dashboardData['totals']['incidents'] ?></h3>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card shadow-sm bg-info text-white">
        <div class="card-body">
          <h5 class="card-title">Total Assets</h5>
          <h3><?= $dashboardData['totals']['assets'] ?></h3>
        </div>
      </div>
    </div>
  </div>

  <!-- Severity Table -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="card shadow-sm bg-dark text-white">
        <div class="card-body">
          <h5 class="card-title text-center">Incidents by Severity</h5>
          <div class="table-responsive">
            <table class="table table-dark table-striped table-hover mb-0">
              <thead>
                <tr>
                  <th>Severity Level</th>
                  <th>Count</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($dashboardData['severity_counts'] as $severityCount): ?>
                  <tr>
                    <td><?= htmlspecialchars($severityCount['severity_name']); ?></td>
                    <td><?= htmlspecialchars($severityCount['count_by_severity']); ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Severity Pie Chart & Type Table -->
  <div class="row mb-4">
    <div class="col-md-6 mb-3">
      <div class="card shadow-sm">
        <div class="card-body bg-dark text-white">
          <h5 class="card-title">Incidents by Severity</h5>
          <div id="severityPieChart" class="w-100" style="height: 300px;"></div>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="card shadow-sm bg-dark text-white">
        <div class="card-body">
          <h5 class="card-title">Incidents by Type</h5>
          <div class="table-responsive">
            <table class="table table-dark table-striped table-hover mb-0">
              <thead>
                <tr>
                  <th>Type</th>
                  <th>Count</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($dashboardData['type_counts'] as $typeCount): ?>
                  <tr>
                    <td><?= htmlspecialchars($typeCount['type_name']); ?></td>
                    <td><?= htmlspecialchars($typeCount['count_by_type']); ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Charts -->
  <div class="row mb-4">
    <div class="col-md-6 mb-3">
      <div class="card shadow-sm bg-dark text-white">
        <div class="card-body">
          <h5 class="card-title">Incidents per Month</h5>
          <canvas id="incidentBarChart" class="w-100"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="card shadow-sm bg-dark text-white">
        <div class="card-body">
          <h5 class="card-title">Incidents by Type</h5>
          <canvas id="incidentTypeChart" class="w-100"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
  // Incident per month (Bar)
  const incBarLabels = <?= json_encode(array_reverse($dashboardData['incidents_per_month']['labels'])) ?>;
  const incBarData = <?= json_encode(array_reverse($dashboardData['incidents_per_month']['data'])) ?>;

  new Chart(document.getElementById('incidentBarChart'), {
    type: 'bar',
    data: {
      labels: incBarLabels,
      datasets: [{
        label: 'Incidents per Month',
        data: incBarData,
        backgroundColor: 'rgba(75,192,192,0.6)',
        borderColor: 'rgba(75,192,192,1)',
        borderWidth: 1,
        borderRadius: 6
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  // Incident by type (Pie)
  new Chart(document.getElementById('incidentTypeChart'), {
    type: 'pie',
    data: {
      labels: <?= json_encode($dashboardData['incident_types']['labels']) ?>,
      datasets: [{
        label: 'Incidents by Type',
        data: <?= json_encode($dashboardData['incident_types']['data']) ?>,
        backgroundColor: [
          '#ff6384', '#36a2eb', '#cc65fe', '#ffce56', '#2ecc71'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true
    }
  });
</script>

<!-- Incidents by Severity (Pixel Chart) -->
<script type="text/javascript">
  google.charts.load('current', { 'packages': ['corechart'] });
  google.charts.setOnLoadCallback(drawSeverityPieChart);

  function drawSeverityPieChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Severity');
    data.addColumn('number', 'Count');
    var severityData = <?= json_encode($dashboardData['severity_counts']); ?>;
    severityData.forEach(function(row) {
      data.addRow([row.severity_name, parseInt(row.count_by_severity)]);
    });

    var options = {
      title: 'Distribution of Incidents by Severity',
      is3D: true,
      backgroundColor: '#212529',
      legendTextStyle: { color: '#ffffff' },
      titleTextStyle: { color: '#ffffff' },
      pieSliceTextStyle: { color: '#000000' }
    };

    var chart = new google.visualization.PieChart(document.getElementById('severityPieChart'));
    chart.draw(data, options);
  }
</script>
