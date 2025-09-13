<?php

declare(strict_types=1);

namespace Telnyx\Client;

use Telnyx\Client\ClientListObjectsResponse\Content;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type client_list_objects_response = array{
 *   contents?: list<Content>, name?: string
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class ClientListObjectsResponse implements BaseModel
{
    /** @use SdkModel<client_list_objects_response> */
    use SdkModel;

    /** @var list<Content>|null $contents */
    #[Api('Contents', list: Content::class, optional: true)]
    public ?array $contents;

    #[Api('Name', optional: true)]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Content> $contents
     */
    public static function with(
        ?array $contents = null,
        ?string $name = null
    ): self {
        $obj = new self;

        null !== $contents && $obj->contents = $contents;
        null !== $name && $obj->name = $name;

        return $obj;
    }

    /**
     * @param list<Content> $contents
     */
    public function withContents(array $contents): self
    {
        $obj = clone $this;
        $obj->contents = $contents;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
