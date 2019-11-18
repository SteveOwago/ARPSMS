<?php
                  require ('includes/db1.php');

                    $commentNewCount = $_POST['commentNewCount'];
                    $sql = "SELECT * FROM activities LIMIT $commentNewCount ";
                    $result = mysqli_query($conn,$sql);

                    if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<p>";
                        echo '<i>'.$row['author'].'</i>';
                         echo "<br>";
                         echo $row['adate'];
                         echo "<br>";
                          echo $row['atime'];
                         echo "<br>";
                          echo $row['venue'];
                         echo "<br>";
                          echo $row['activity'];
                          echo "<br>";

                        echo "</p>";
                      }
                    }
                    else
                    {
                      echo "There are no comments";
                    }

                    ?>
