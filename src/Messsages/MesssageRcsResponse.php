<?php

declare(strict_types=1);

namespace Telnyx\Messsages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\MesssageRcsResponse\Data;
use Telnyx\Messsages\MesssageRcsResponse\Data\From;
use Telnyx\Messsages\MesssageRcsResponse\Data\To;

/**
 * @phpstan-type MesssageRcsResponseShape = array{data?: Data|null}
 */
final class MesssageRcsResponse implements BaseModel
{
    /** @use SdkModel<MesssageRcsResponseShape> */
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
     *   body?: RcsAgentMessage|null,
     *   direction?: string|null,
     *   encoding?: string|null,
     *   from?: From|null,
     *   messaging_profile_id?: string|null,
     *   organization_id?: string|null,
     *   received_at?: \DateTimeInterface|null,
     *   record_type?: string|null,
     *   to?: list<To>|null,
     *   type?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   body?: RcsAgentMessage|null,
     *   direction?: string|null,
     *   encoding?: string|null,
     *   from?: From|null,
     *   messaging_profile_id?: string|null,
     *   organization_id?: string|null,
     *   received_at?: \DateTimeInterface|null,
     *   record_type?: string|null,
     *   to?: list<To>|null,
     *   type?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
