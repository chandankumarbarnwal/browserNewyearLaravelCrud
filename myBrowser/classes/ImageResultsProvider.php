<?php

 // class to fetch the number of result and result details
 class ImageResultsProvider{

 	private $con;

 	public function __construct($con){

 		$this->con = $con;
 	}

 	// get total number of results found of given term/ url
 	public function getNumResults($term) {
 		$query = $this->con->prepare("SELECT COUNT(*) AS total 
 									  FROM images 
 									  where (title like :term 
 									  or alt like :term) 
 									  AND broken=0");


 		$searchTerm = "%".$term."%";
       $query->bindParam(':term', $searchTerm);
       $query->execute();
       $row = $query->fetch(PDO::FETCH_ASSOC);

       return $row['total'];

 	}// function getNumResults ended


 	// get results of given term/ url
	public function getResultsHtml($page, $pageSize,$term) {

		$frontLimit = ($page -1) * $pageSize;

		$query = $this->con->prepare("SELECT * 
 									  FROM images 
 									  where (title like :term 
 									  or alt like :term) 
 									  AND broken=0
	 								  order by clicks desc
	 								  limit :frontLimit, :pageSize");


	 		$searchTerm = "%".$term."%";
	        $query->bindParam(':term', $searchTerm);
	        $query->bindParam(':frontLimit', $frontLimit, PDO::PARAM_INT);
	        $query->bindParam(':pageSize', $pageSize, PDO::PARAM_INT);

	        $query->execute();

            $resultsHtml = "<div class='imageResults'>";
            $count = 0;
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
       			$count++;
                        $id = $row['id'];
       			$imageUrl = $row['imageUrl'];
       			$siteUrl = $row['siteUrl'];
       			$title = $row['title'];
       			$alt = $row['alt'];
       	
       			if ($title) {
       				$displayText = $title;
       			}elseif ($alt) {
       			   	$displayText = $alt;
       			}else{
       				$displayText = $imageUrl;
       			}



				$resultsHtml .= "<div class='gridItem image$count' >
									<a href='$imageUrl' data-fancybox data-caption='$displayText' data-siteurl='$siteUrl'>
										
                                                            <script>
                                                            $(document).ready(function () {
                                                                  loadImage(\"$imageUrl\",\"image$count\");
                                                            });

                                                            </script>
                                                            <span class='details'>$displayText</span>
									</a>
									
				       			</div>";
   			}

	   		$resultsHtml .="</div>";
	   		return $resultsHtml;

 	} // function getResultsHtml ended


 }// class SiteResultsProvider ended
?>