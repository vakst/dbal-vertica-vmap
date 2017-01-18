<?php
namespace vakst\VerticaBundle\DBAL\Types;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class VMapType extends Type
{
    const VMAP = 'vmap';

    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getBinaryTypeDeclarationSQL($fieldDeclaration);
    }

    public function getName()
    {
        return self::VMAP;
    }

    public function canRequireSQLConversion()
    {
        return true;
    }

    /**
     * Modifies the SQL expression (identifier, parameter) to convert to a PHP value.
     *
     * @param string                                    $sqlExpr
     * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform
     *
     * @return string
     */
    public function convertToPHPValueSQL($sqlExpr, $platform)
    {
        return sprintf('maptostring(%s)', $sqlExpr);
    }

    /**
     * Modifies the SQL expression (identifier, parameter) to convert to a database value.
     *
     * @param string                                    $sqlExpr
     * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform
     *
     * @return string
     */
    public function convertToDatabaseValueSQL($sqlExpr, AbstractPlatform $platform)
    {
        return sprintf('MapJSONExtractor(%s)', $sqlExpr);
    }
}