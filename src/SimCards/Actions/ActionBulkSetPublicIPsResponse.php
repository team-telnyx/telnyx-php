<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\Actions\ActionBulkSetPublicIPsResponse\Data;
use Telnyx\SimCards\Actions\ActionBulkSetPublicIPsResponse\Data\ActionType;

/**
 * @phpstan-type ActionBulkSetPublicIPsResponseShape = array{data?: Data|null}
 */
final class ActionBulkSetPublicIPsResponse implements BaseModel
{
    /** @use SdkModel<ActionBulkSetPublicIPsResponseShape> */
    use SdkModel;

    /**
     * This object represents a bulk SIM card action. It groups SIM card actions created through a bulk endpoint under a single resource for further lookup.
     */
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
     *   actionType?: value-of<ActionType>|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   settings?: array<string,mixed>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * This object represents a bulk SIM card action. It groups SIM card actions created through a bulk endpoint under a single resource for further lookup.
     *
     * @param Data|array{
     *   id?: string|null,
     *   actionType?: value-of<ActionType>|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   settings?: array<string,mixed>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
