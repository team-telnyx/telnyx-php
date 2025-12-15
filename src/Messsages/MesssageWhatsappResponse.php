<?php

declare(strict_types=1);

namespace Telnyx\Messsages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\MesssageWhatsappResponse\Data;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\From;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\To;

/**
 * @phpstan-type MesssageWhatsappResponseShape = array{data?: Data|null}
 */
final class MesssageWhatsappResponse implements BaseModel
{
    /** @use SdkModel<MesssageWhatsappResponseShape> */
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
     *   id?: string|null,
     *   body?: Body|null,
     *   direction?: string|null,
     *   encoding?: string|null,
     *   from?: From|null,
     *   messagingProfileID?: string|null,
     *   organizationID?: string|null,
     *   receivedAt?: \DateTimeInterface|null,
     *   recordType?: string|null,
     *   to?: list<To>|null,
     *   type?: string|null,
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
     *   id?: string|null,
     *   body?: Body|null,
     *   direction?: string|null,
     *   encoding?: string|null,
     *   from?: From|null,
     *   messagingProfileID?: string|null,
     *   organizationID?: string|null,
     *   receivedAt?: \DateTimeInterface|null,
     *   recordType?: string|null,
     *   to?: list<To>|null,
     *   type?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
