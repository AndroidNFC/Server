<?php
    //$xmlObject = Xml::build($services_xml);
    $xmlObject = Xml::fromArray($services_xml, array(
        'format' => 'tags'
    ));
    echo $xmlObject->saveXML();
?>
