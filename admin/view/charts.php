<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<style>
.chartBar {
    text-align: center;
    width: 100%;
    height: 100%;
    margin-bottom: 10rem;
}

.chartBar h3 {
    margin: 30px;
    font-size: 20px;
    font-weight: 800;
    color: #2f9d77;
}

.tableMyChart {
    width: 70%;
    margin: 0 auto;
}

.wrapperChart {
    width: 70%;
    height: 30rem;
    margin: 0 auto;
}
</style>
<div class="chartBar">
    <div class="tableMyChart">
        <h2 style="color: #2f9d77; margin-top: 1rem;">Thống kê giá sản phẩm</h2>
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>thông số</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>cvvxcv</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="wrapperChart">
        <h3>Biểu đồ tổng số sản phẩm theo danh mục</h3>
        <canvas id="myChart" style="width: 100%; height: 100%;"></canvas>
    </div>
</div>
<?php 
    //* Get count table name_cate(database) follow name category
    function getCount(){
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT name_cate, COUNT(name_cate) as 'countNameCate' FROM `product` GROUP BY name_cate;");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt -> fetchAll();
        // $kq = $stmt -> fetchColumn();
        return $kq;
    }
    $kq = getCount();
    foreach($kq as $value){
        $cate[] = $value['name_cate'];
        $data[] = $value['countNameCate'];
    }
?>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode(str_replace('-', ' ', $cate)) ?>,
        datasets: [{
            label: 'Sản phẩm',
            data: <?php echo json_encode($data) ?>,
            backgroundColor: [
                '#C4E4E9',
            ],
            borderColor: [
                // 'rgba(255, 99, 132, 1)',
                // 'rgba(54, 162, 235, 1)',
                // 'rgba(255, 206, 86, 1)',
                // 'rgba(75, 192, 192, 1)',
                // 'rgba(153, 102, 255, 1)',
                // 'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 0
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    font: {
                        size: 16
                    }
                }
            }
        }
    }
});
</script>