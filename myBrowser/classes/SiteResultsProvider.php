<?php

 // class to fetch the number of result and result details
 class SiteResultsProvider{

 	private $con;

 	public function __construct($con){

 		$this->con = $con;
 	}

 	// get total number of results found of given term/ url
 	public function getNumResults($term) {
 		$query = $this->con->prepare("SELECT COUNT(*) AS total 
 									  FROM sites
 									  where title like :term 
 									  or url like :term 
 									  or keywords like :term 
 									  or description like :term ");


 		$searchTerm = "%".$term."%";
       $query->bindParam(':term', $searchTerm);
       $query->execute();
       $row = $query->fetch(PDO::FETCH_ASSOC);

       return $row['total'];

 	}// function getNumResults ended


 	// get results of given term/ url
	public function getResultsHtml($page, $pageSize,$term) {

		$frontLimit = ($page -1) * $pageSize;

		$query = $this->con->prepare("SELECT *FROM sites
	 									  where title like :term 
	 									  or url like :term 
	 									  or keywords like :term 
	 									  or description like :term 
	 									  order by clicks desc
	 									  limit :frontLimit, :pageSize");


	 		$searchTerm = "%".$term."%";
	        $query->bindParam(':term', $searchTerm);
	        $query->bindParam(':frontLimit', $frontLimit, PDO::PARAM_INT);
	        $query->bindParam(':pageSize', $pageSize, PDO::PARAM_INT);

	        $query->execute();

            $resultsHtml = "<div class='siteResults'>";

            while($row = $query->fetch(PDO::FETCH_ASSOC)){
       			$id = $row['id'];
       			$url = $row['url'];
       			$title = $row['title'];
       			$description = $row['description'];

       			$title = $this->trimField($title, 55);

       			$description = $this->trimField($description, 130);


				$resultsHtml .= "<div class='resultContainer' >
									<h3 class='title'>
										<a class='result' href='$url'>
											$title
										</a>
									</h3>
									
									<span class='url'>$url</span>

									<span class='description'>$description</span>

				       			</div>";
   			}

	   		$resultsHtml .="</div>";
	   		return $resultsHtml;

 	} // function getResultsHtml ended


 	// Trim the title and description length and append '....' if greater then the specified length
	private function trimField($string, $stringLimit){
		$dots = ((strlen($string) > $stringLimit) ? "...":"");
		return substr($string, 0, $stringLimit).$dots;
	}// function trimField ended


 }// class SiteResultsProvider ended
?>