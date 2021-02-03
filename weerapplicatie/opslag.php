<div class="big-list">
                        <?php
                        for($i = 0; $i <= 3; $i++){
                            if($i == 3){
                                $repeat = 4;
                            }
                            else{
                                $repeat = 6;
                            }
                            print("
                            <div class='list-row'>
                                <div class='lr-in'>
                                    ");
                            for($j = 0; $j <= $repeat; $j++){
                                print("
                                <div class='letter-box'>
                                    <h4>A</h4>
                                    <p><a href='#'>Apeldoorn</a></p>
                                    <p><a href='#'>Apeldoorn</a></p>
                                    <p><a href='#'>Apeldoorn</a></p>
                                    <p><a href='#'>Apeldoorn</a></p>
                                </div>
                                ");
                            }
                            print("
                                </div>
                            </div>
                            ");
                        }
                        ?>
                        
                    </div>