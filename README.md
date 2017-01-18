# VerticaBundle
Provides VMap Vertica doctrine type and function

Symfony configuration example
```
doctrine:
    orm:
        entity_managers:
            default:                
                dql:
                    string_functions:
                        mapdelimitedextractor:   vakst\VerticaBundle\DQL\MapdelimitedextractorFunction
                        maptostring:   vakst\VerticaBundle\DQL\MaptostringFunction
                        MapJSONExtractor:   vakst\VerticaBundle\DQL\MapJSONExtractorFunction
    dbal:
        types:
            vmap: vakst\VerticaBundle\DBAL\Types\VMapType
```