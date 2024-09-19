<?php 
if (urlIs('/')): ;?> 
    <script src="../../assets/index.js"></script>
<?php else: ?>
    <script>console.log('hello non-homepage page js!');</script>
<?php endif; ?>
    </body>
</html>