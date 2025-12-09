<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Releases;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\Releases\ReleaseGetResponse\Data;
use Telnyx\ExternalConnections\Releases\ReleaseGetResponse\Data\Status;
use Telnyx\ExternalConnections\Releases\ReleaseGetResponse\Data\TelephoneNumber;

/**
 * @phpstan-type ReleaseGetResponseShape = array{data?: Data|null}
 */
final class ReleaseGetResponse implements BaseModel
{
    /** @use SdkModel<ReleaseGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   createdAt?: string|null,
     *   errorMessage?: string|null,
     *   status?: value-of<Status>|null,
     *   telephoneNumbers?: list<TelephoneNumber>|null,
     *   tenantID?: string|null,
     *   ticketID?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   createdAt?: string|null,
     *   errorMessage?: string|null,
     *   status?: value-of<Status>|null,
     *   telephoneNumbers?: list<TelephoneNumber>|null,
     *   tenantID?: string|null,
     *   ticketID?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
