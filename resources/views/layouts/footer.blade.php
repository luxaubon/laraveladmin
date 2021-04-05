 <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="assets_home/js/bootstrap.min.js"></script>
  <script src="assets_home/js/swiper.min.js"></script>
  <script src="assets_home/js/script.js"></script>

<script type="text/javascript" src="/jquery.Thailand.js/dependencies/zip.js/zip.js"></script>
<script type="text/javascript" src="/jquery.Thailand.js/dependencies/JQL.min.js"></script>
<script type="text/javascript" src="/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
<script type="text/javascript" src="/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>
<script type="text/javascript">
    $.Thailand({
            database: '/jquery.Thailand.js/database/db.json', 

            $district: $('#form-insert [name="district"]'),
            $amphoe: $('#form-insert [name="amphoe"]'),
            $province: $('#form-insert [name="province"]'),
            $zipcode: $('#form-insert [name="zipcode"]'),

            onDataFill: function(data){
                console.info('Data Filled', data);
            },

            onLoad: function(){
                console.info('Autocomplete is ready!');
                $('#loader, .demo').toggle();
            }
        });

  function social_share() {
          window.open(
              'https://www.facebook.com/sharer.php?u=https://hivitaminc200.com/&hashtag=%23hivitaminc',
              'sharer', 'toolbar=0,status=0,width=626,height=436');
      return false;
  }

  </script>
</body>

</html>