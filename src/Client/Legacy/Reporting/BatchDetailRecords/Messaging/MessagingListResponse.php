<?php

declare(strict_types=1);

namespace Telnyx\Client\Legacy\Reporting\BatchDetailRecords\Messaging;

use Telnyx\Client\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingListResponse\Data;
use Telnyx\Client\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingListResponse\Meta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type messaging_list_response = array{data?: list<Data>, meta?: Meta}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class MessagingListResponse implements BaseModel
{
    /** @use SdkModel<messaging_list_response> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?Meta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data> $data
     */
    public static function with(?array $data = null, ?Meta $meta = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<Data> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(Meta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
