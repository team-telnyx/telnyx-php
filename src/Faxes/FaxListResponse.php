<?php

declare(strict_types=1);

namespace Telnyx\Faxes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Faxes\Fax\Direction;
use Telnyx\Faxes\Fax\Quality;
use Telnyx\Faxes\Fax\RecordType;
use Telnyx\Faxes\Fax\Status;

/**
 * @phpstan-type FaxListResponseShape = array{data?: list<Fax>|null, meta?: mixed}
 */
final class FaxListResponse implements BaseModel
{
    /** @use SdkModel<FaxListResponseShape> */
    use SdkModel;

    /** @var list<Fax>|null $data */
    #[Optional(list: Fax::class)]
    public ?array $data;

    #[Optional]
    public mixed $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Fax|array{
     *   id?: string|null,
     *   clientState?: string|null,
     *   connectionID?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   direction?: value-of<Direction>|null,
     *   from?: string|null,
     *   fromDisplayName?: string|null,
     *   mediaName?: string|null,
     *   mediaURL?: string|null,
     *   previewURL?: string|null,
     *   quality?: value-of<Quality>|null,
     *   recordType?: value-of<RecordType>|null,
     *   status?: value-of<Status>|null,
     *   storeMedia?: bool|null,
     *   storedMediaURL?: string|null,
     *   to?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   webhookFailoverURL?: string|null,
     *   webhookURL?: string|null,
     * }> $data
     */
    public static function with(?array $data = null, mixed $meta = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Fax|array{
     *   id?: string|null,
     *   clientState?: string|null,
     *   connectionID?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   direction?: value-of<Direction>|null,
     *   from?: string|null,
     *   fromDisplayName?: string|null,
     *   mediaName?: string|null,
     *   mediaURL?: string|null,
     *   previewURL?: string|null,
     *   quality?: value-of<Quality>|null,
     *   recordType?: value-of<RecordType>|null,
     *   status?: value-of<Status>|null,
     *   storeMedia?: bool|null,
     *   storedMediaURL?: string|null,
     *   to?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   webhookFailoverURL?: string|null,
     *   webhookURL?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    public function withMeta(mixed $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
