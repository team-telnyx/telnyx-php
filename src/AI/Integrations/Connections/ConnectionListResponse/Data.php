<?php

declare(strict_types=1);

namespace Telnyx\AI\Integrations\Connections\ConnectionListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id: string, allowed_tools: list<string>, integration_id: string
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Api]
    public string $id;

    /** @var list<string> $allowed_tools */
    #[Api(list: 'string')]
    public array $allowed_tools;

    #[Api]
    public string $integration_id;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(id: ..., allowed_tools: ..., integration_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withID(...)->withAllowedTools(...)->withIntegrationID(...)
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
     * @param list<string> $allowed_tools
     */
    public static function with(
        string $id,
        array $allowed_tools,
        string $integration_id
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->allowed_tools = $allowed_tools;
        $obj->integration_id = $integration_id;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * @param list<string> $allowedTools
     */
    public function withAllowedTools(array $allowedTools): self
    {
        $obj = clone $this;
        $obj->allowed_tools = $allowedTools;

        return $obj;
    }

    public function withIntegrationID(string $integrationID): self
    {
        $obj = clone $this;
        $obj->integration_id = $integrationID;

        return $obj;
    }
}
