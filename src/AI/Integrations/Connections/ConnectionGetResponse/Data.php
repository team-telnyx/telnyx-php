<?php

declare(strict_types=1);

namespace Telnyx\AI\Integrations\Connections\ConnectionGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id: string, allowedTools: list<string>, integrationID: string
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Api]
    public string $id;

    /** @var list<string> $allowedTools */
    #[Api('allowed_tools', list: 'string')]
    public array $allowedTools;

    #[Api('integration_id')]
    public string $integrationID;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(id: ..., allowedTools: ..., integrationID: ...)
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
     * @param list<string> $allowedTools
     */
    public static function with(
        string $id,
        array $allowedTools,
        string $integrationID
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->allowedTools = $allowedTools;
        $obj->integrationID = $integrationID;

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
        $obj->allowedTools = $allowedTools;

        return $obj;
    }

    public function withIntegrationID(string $integrationID): self
    {
        $obj = clone $this;
        $obj->integrationID = $integrationID;

        return $obj;
    }
}
