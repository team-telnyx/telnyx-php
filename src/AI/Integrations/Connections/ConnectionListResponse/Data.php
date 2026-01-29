<?php

declare(strict_types=1);

namespace Telnyx\AI\Integrations\Connections\ConnectionListResponse;

use Telnyx\Core\Attributes\Required;
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

    #[Required]
    public string $id;

    /** @var list<string> $allowedTools */
    #[Required('allowed_tools', list: 'string')]
    public array $allowedTools;

    #[Required('integration_id')]
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
        $self = new self;

        $self['id'] = $id;
        $self['allowedTools'] = $allowedTools;
        $self['integrationID'] = $integrationID;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param list<string> $allowedTools
     */
    public function withAllowedTools(array $allowedTools): self
    {
        $self = clone $this;
        $self['allowedTools'] = $allowedTools;

        return $self;
    }

    public function withIntegrationID(string $integrationID): self
    {
        $self = clone $this;
        $self['integrationID'] = $integrationID;

        return $self;
    }
}
