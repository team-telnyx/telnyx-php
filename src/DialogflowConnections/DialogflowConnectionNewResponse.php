<?php

declare(strict_types=1);

namespace Telnyx\DialogflowConnections;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DialogflowConnections\DialogflowConnectionNewResponse\Data;

/**
 * @phpstan-type DialogflowConnectionNewResponseShape = array{data: Data}
 */
final class DialogflowConnectionNewResponse implements BaseModel
{
    /** @use SdkModel<DialogflowConnectionNewResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new DialogflowConnectionNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DialogflowConnectionNewResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DialogflowConnectionNewResponse)->withData(...)
     * ```
     */
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
     *   connection_id?: string|null,
     *   conversation_profile_id?: string|null,
     *   environment?: string|null,
     *   record_type?: string|null,
     *   service_account?: string|null,
     * } $data
     */
    public static function with(Data|array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   connection_id?: string|null,
     *   conversation_profile_id?: string|null,
     *   environment?: string|null,
     *   record_type?: string|null,
     *   service_account?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
