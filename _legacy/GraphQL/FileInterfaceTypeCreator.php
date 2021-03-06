<?php

namespace SilverStripe\AssetAdmin\GraphQL;

use SilverStripe\GraphQL\DataObjectInterfaceTypeCreator;
use GraphQL\Type\Definition\Type;
use SilverStripe\Assets\File;
use SilverStripe\Assets\Folder;
use SilverStripe\Versioned\RecursivePublishable;

if (!class_exists(DataObjectInterfaceTypeCreator::class)) {
    return;
}

/**
 * @skipUpgrade
 * @deprecated 4.8..5.0 Use silverstripe/graphql:^4 functionality.
 */
class FileInterfaceTypeCreator extends DataObjectInterfaceTypeCreator
{

    public function attributes()
    {
        return [
            'name' => 'FileInterface',
            'description' => 'Interface for files and folders',
        ];
    }

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'created' => [
                'type' => Type::string(),
            ],
            'lastEdited' => [
                'type' => Type::string(),
            ],
            'owner' => [
                'type' => Type::string(),
            ],
            'parentId' => [
                'type' => Type::int(),
            ],
            'title' => [
                'type' => Type::string(),
            ],
            'type' => [
                'type' => Type::string(),
            ],
            'category' => [
                'type' => Type::string(),
            ],
            'exists' => [
                'type' => Type::boolean(),
            ],
            'name' => [
                'type' => Type::string(),
            ],
            'filename' => [
                'type' => Type::string(),
            ],
            'url' => [
                'type' => Type::string(),
            ],
            'canView' => [
                'type' => Type::boolean(),
            ],
            'canEdit' => [
                'type' => Type::boolean(),
            ],
            'canDelete' => [
                'type' => Type::boolean(),
            ],
            'hasRestrictedAccess' => [
                'type' => Type::boolean(),
            ],
            'visibility' => [
                'type' => Type::string(),
            ],
        ];
    }

    public function resolveType($object)
    {
        if ($object instanceof Folder) {
            return $this->manager->getType('Folder');
        }
        if ($object instanceof File) {
            return $this->manager->getType('File');
        }
        return null;
    }
}
