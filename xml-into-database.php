<?php
    $database = dbConnect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
    $xmlfile = xmlOpen('../'.CONTENTDB);

    foreach($xmlfile->quote as $key) {
        $quotetext = $key->quotetext;
        $quoteauthor = $key->author;
        $quotejob = $key->job;
        $quotead = $key->advertising;
        $quotedate = $key->date;

        $sqlstring = "INSERT INTO quotes (quotetext, author, job, advertising, date) VALUES (:quotetext, :author, :job, :advertising, :date)";

        $statement = $database->prepare($sqlstring);
        $statement->bindParam(':quotetext', $quotetext);
        $statement->bindParam(':author', $quoteauthor);
        $statement->bindParam(':job', $quotejob);
        $statement->bindParam(':advertising', $quotead);
        $statement->bindParam(':date', $quotedate);

        $statement->execute();
    }
                        
                   
