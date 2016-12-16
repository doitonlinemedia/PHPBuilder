<?php         /*
if(!defined("N"))
{
    define("N", "\n");
}
if(!defined("T"))
{
    define("T", "\t");
}
            */
define("PHPBUILDER_VISIBILITY_PRIVATE", 'private');
define("PHPBUILDER_VISIBILITY_PROTECTED", 'protected');
define("PHPBUILDER_VISIBILITY_PUBLIC", 'public');
                
class PHPBuilder
{
    private $files = array();
    
    public function __construct()
    {
        
    }
    
    public function AddFile(PHPBuilderFile $file)
    {
        $this->files[] = $file;
    }
    
    public function Render()
    {
        foreach($this->files as $file)
        {
            $file->Render();
        }
    }
}
                                     
                                     /*         
$phpbuilder = new PHPBuilder();
    $file = new PHPBuilderFile('nieuwsberichtentity.test.php');
    $file->AddElement(new PHPBuilderPHPOpen());
        $class = new PHPBuilderClass('NieuwsberichtEntity');
        $class->setExtends('EntityBase');
            $classConstant1 = new PHPBuilderClassConstant('nodb_module');
            $classConstant1->setValue('nieuws');
        $class->AddElement($classConstant1);
            $classConstant2 = new PHPBuilderClassConstant('nodb_parent_depth');
            $classConstant2->setValue('Geen parentveld');
        $class->AddElement($classConstant2);
        $class->AddElement(new PHPBuilderNewline());
            $method = new PHPBuilderMethod('CustomCheckActive');
            $method->AddElement(new PHPBuilderLine('return true;'));
        $class->AddElement($method);
            $property1 = new PHPBuilderProperty('nodb_values');
            $property1->setValue(array(
                'reference_clean_url' => array(
                    'object' => null,
                ),
                'id' => null,
                'taalcode' => null,
                'volgorde' => null,
                'clean_url_id' => null,
                'naam' => '',
                'seo_titel' => '',
                'datum' => null,
                'datum_start' => null,
                'datum_eind' => null,
                'samenvatting' => '',
                'seo_description' => '',
                'seo_keywords' => '',
                'content' => '',
                'afbeelding' => '',
                'active' => 1,
            ));
        $class->AddElement($property1);
    $file->AddElement($class);
$phpbuilder->AddFile($file);
$phpbuilder->Render();*/