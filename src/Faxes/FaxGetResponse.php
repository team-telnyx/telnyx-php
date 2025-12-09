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
 * @phpstan-type FaxGetResponseShape = array{data?: Fax|null}
 */
final class FaxGetResponse implements BaseModel
{
    /** @use SdkModel<FaxGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Fax $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Fax|array{
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
     * } $data
     */
    public static function with(Fax|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Fax|array{
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
     * } $data
     */
    public function withData(Fax|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
