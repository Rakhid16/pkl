

    <script type="text/javascript">
        $(document).ready(function(){
            $('#myModal1').on('show.bs.modal', function (e) {
                var nopeg = $(e.relatedTarget).data('id');
                //menggunakan cc ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'detail_master.php',
                    data :  'nopeg='+ nopeg,
                    success : function(data){
                    $('.fetched-data').html(data);//menampilkan data ke dalam modal
                    }
                });
             });
        });
    </script>

</script>
    <script type="text/javascript">
    $(function() {
    if (localStorage.getItem('s_cc')) {
        $("#s_cc option").eq(localStorage.getItem('s_cc')).prop('selected', true);
    }

    $("#s_cc").on('change', function() {
        localStorage.setItem('s_cc', $('option:selected', this).index());
        });
    });

    </script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    
    <!-- <script src="../static/js/homeJS/vendor/jquery-1.11.3.min.js"></script> -->
    
    <script src="../static/js/homeJS/bootstrap.min.js"></script>
    
    <script src="../static/js/homeJS/jquery.meanmenu.js"></script>
    
    <script src="../static/js/homeJS/jquery.mCustomScrollbar.concat.min.js"></script>
    
    <script src="../static/js/homeJS/jquery.sticky.js"></script>
    
    <script src="../static/js/homeJS/jquery.scrollUp.min.js"></script>
    
    <script src="../static/js/homeJS/counterup/waypoints.min.js"></script>
    <script src="../static/js/homeJS/counterup/counterup-active.js"></script>
    <script src="../static/js/homeJS/counterup/jquery.counterup.min.js"></script>    

    <script src="../static/js/homeJS/peity/peity-active.js"></script>
    <script src="../static/js/homeJS/peity/jquery.peity.min.js"></script>
    
    <script src="../static/js/homeJS/sparkline/sparkline-active.js"></script>
    <script src="../static/js/homeJS/sparkline/jquery.sparkline.min.js"></script>

    <script src="../static/js/homeJS/flot/Chart.min.js"></script>
    <script src="../static/js/homeJS/flot/flot-active.js"></script>
    
    <script src="../static/js/homeJS/map/usa_states.js"></script>
    <script src="../static/js/homeJS/map/map-active.js"></script>
    <script src="../static/js/homeJS/map/raphael.min.js"></script>
    <script src="../static/js/homeJS/map/jquery.mapael.js"></script>
    <script src="../static/js/homeJS/map/world_countries.js"></script>
    <script src="../static/js/homeJS/map/france_departments.js"></script>
    
    <script src="../static/js/homeJS/data-table/tableExport.js"></script>
    <script src="../static/js/homeJS/data-table/bootstrap-table.js"></script>
    <script src="../static/js/homeJS/data-table/data-table-active.js"></script>
    
    <script src="../static/js/homeJS/data-table/bootstrap-editable.js"></script>
    <script src="../static/js/homeJS/data-table/bootstrap-table-export.js"></script>
    <script src="../static/js/homeJS/data-table/colResizable-1.5.source.js"></script>
    <script src="../static/js/homeJS/data-table/bootstrap-table-editable.js"></script>
    <script src="../static/js/homeJS/data-table/bootstrap-table-resizable.js"></script>
    
    <script src="../static/js/homeJS/main.js"></script>
    <script type="text/javascript">$(".chosen").chosen()</script>