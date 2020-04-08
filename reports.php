
<?php include ("layouts/header.php"); ?>
  <div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->    
    <?php include ("layouts/sidebarmenu.php"); ?>
    <!-- partial -->
    <div class="main-wrapper mdc-drawer-app-content">
      <!-- partial:partials/_navbar.html -->
      <?php include ("layouts/navbar.php"); ?>  
      <!-- partial -->
      <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
        <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop">
                <div class="mdc-card">
                  <h6 class="card-title">Line chart</h6>
                  <canvas id="lineChart"></canvas>
                </div>
              </div>
              <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop">
                <div class="mdc-card">
                  <h6 class="card-title">Bar chart</h6>
                  <canvas id="barChart"></canvas>
                </div>
              </div>
              <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop">
                <div class="mdc-card">
                  <h6 class="card-title">Area chart</h6>
                  <canvas id="areaChart"></canvas>
                </div>
              </div>
              <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop">
                <div class="mdc-card">
                  <h6 class="card-title">Doughnut chart</h6>
                  <canvas id="doughnutChart"></canvas>
                </div>
              </div>
              <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop">
                <div class="mdc-card">
                  <h6 class="card-title">Pie chart</h6>
                  <canvas id="pieChart"></canvas>
                </div>
              </div>
              <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop">
                <div class="mdc-card">
                  <h6 class="card-title">Scatter chart</h6>
                  <canvas id="scatterChart"></canvas>
                </div>
              </div>
            </div>
        </main>
        <!-- partial:partials/_footer.html -->
        <?php include ("layouts/footer.php"); ?>
        
        