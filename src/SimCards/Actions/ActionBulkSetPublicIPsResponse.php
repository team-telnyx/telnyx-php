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
     *   action_type?: value-of<ActionType>|null,
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   settings?: array<string,mixed>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * This object represents a bulk SIM card action. It groups SIM card actions created through a bulk endpoint under a single resource for further lookup.
     *
     * @param Data|array{
     *   id?: string|null,
     *   action_type?: value-of<ActionType>|null,
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   settings?: array<string,mixed>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
