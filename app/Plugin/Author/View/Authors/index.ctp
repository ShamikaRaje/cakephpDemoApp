<?php
    // $data = $this->requestAction('authors/index');
    //echo "<pre>"; print_r($authorsData); exit;
    $transport = new \Kendo\Data\DataSourceTransport();

    $read = new \Kendo\Data\DataSourceTransportRead();

    $read->url($this->Html->url(array('controller' => 'Authors', 'action' => 'setData' )))
         ->contentType('application/json')
         ->type('POST');

    $transport ->read($read)
        ->parameterMap('function(data) {
            return kendo.stringify(data);
        }');

    $model = new \Kendo\Data\DataSourceSchemaModel();
        
    $idField = new \Kendo\Data\DataSourceSchemaModelField('id');
    $idField->type('number');

    $nameField = new \Kendo\Data\DataSourceSchemaModelField('Name');
    $nameField->type('string');

    $book_publishedField = new \Kendo\Data\DataSourceSchemaModelField('Book_published');
    $book_publishedField->type('string');

    $createdOnField = new \Kendo\Data\DataSourceSchemaModelField('CreatedOn');
    $createdOnField->type('date');
    //->format('{0:yyyy/MM/dd}');
                    //->format: "{0:yyyy/MM/dd HH:mm}";

    $model->addField($idField)
          ->addField($nameField)
          ->addField($book_publishedField)
          ->addField($createdOnField);

    $schema = new \Kendo\Data\DataSourceSchema();
    $schema->model($model)
            ->data('setData');

    $dataSource = new \Kendo\Data\DataSource();

    $dataSource->transport($transport)
                ->batch(true)
                ->serverPaging(true)
                ->serverSorting(true)
                ->serverGrouping(true)
                ->schema($schema);
    

    $grid = new \Kendo\UI\Grid('Author');

    $id = new \Kendo\UI\GridColumn();
    $id->field('id')
            ->title('ID')
            ->width(140);

    $name = new \Kendo\UI\GridColumn();
    $name->field('Name')
                ->title('Name')
                ->width(140);
                
    $book_published = new \Kendo\UI\GridColumn();
    $book_published->field('Book_published')
                ->title('Book Published')
                ->width(190);            

    $createdDate = new \Kendo\UI\GridColumn();
    $createdDate->field('CreatedOn')
                ->title('Created Date');

    $pageable = new Kendo\UI\GridPageable();
    $pageable->refresh(true)
          ->pageSizes(true)
          ->buttonCount(5);
            
    $grid->addColumn($id, $name, $book_published, $createdDate)
         ->dataSource($dataSource)     
         ->sortable(true)
         ->autobind(true)
         ->groupable(true)
         ->pageable($pageable)
         ->addToolbarItem(new \Kendo\UI\GridToolbarItem('create'),
              new \Kendo\UI\GridToolbarItem('save'), new \Kendo\UI\GridToolbarItem('cancel'))
         ->editable(true)
         ->attr('style', 'height:380px');

    echo $grid->render();

?>
<script>
   /* function onChange() {
        var value = $("#color").val();
        $("#cap")
            .toggleClass("black-cap", value == 1)
            .toggleClass("orange-cap", value == 2)
            .toggleClass("grey-cap", value == 3);
    };

    $(document).ready(function() {
        var color = $("#color").data("kendoDropDownList");
        var size = $("#size").data("kendoDropDownList");

        $("#get").click(function() {
            alert('Thank you! Your Choice is:\n\nColor ID: '+color.value()+' and Size: '+size.value());
        });
    });*/
</script>











