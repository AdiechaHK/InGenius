
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=<?php echo "\"".base_url("public/js/angular.min.js")."\""; ?>></script>
    <!--
    <script src=<?php echo "\"".base_url("public/js/app-angular.js")."\""; ?>></script>
    <script src=<?php echo "\"".base_url("public/js/controller-angular.js")."\""; ?>></script>
    <script src=<?php echo "\"".base_url("public/js/service-angular.js")."\""; ?>></script>
    -->
    <script src=<?php echo "\"".base_url("public/js/common.js")."\""; ?>></script>
    <?php foreach ($js as $script_name) { ?>
    <script src=<?php echo "\"".base_url("public/js/".$script_name.".js")."\""; ?>></script>
    <?php } ?>
  </body>
</html>