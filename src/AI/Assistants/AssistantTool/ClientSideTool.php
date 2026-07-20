<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ClientSideToolShape from \Telnyx\AI\Assistants\AssistantTool\ClientSideTool\ClientSideTool as ClientSideToolShape1
 *
 * @phpstan-type ClientSideToolShape = array{
 *   clientSideTool: \Telnyx\AI\Assistants\AssistantTool\ClientSideTool\ClientSideTool|ClientSideToolShape1,
 *   type: 'client_side_tool',
 * }
 */
final class ClientSideTool implements BaseModel
{
    /** @use SdkModel<ClientSideToolShape> */
    use SdkModel;

    /** @var 'client_side_tool' $type */
    #[Required]
    public string $type = 'client_side_tool';

    #[Required('client_side_tool')]
    public ClientSideTool\ClientSideTool $clientSideTool;

    /**
     * `new ClientSideTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ClientSideTool::with(clientSideTool: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ClientSideTool)->withClientSideTool(...)
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
     * @param ClientSideTool\ClientSideTool|ClientSideToolShape1 $clientSideTool
     */
    public static function with(
        ClientSideTool\ClientSideTool|array $clientSideTool,
    ): self {
        $self = new self;

        $self['clientSideTool'] = $clientSideTool;

        return $self;
    }

    /**
     * @param ClientSideTool\ClientSideTool|ClientSideToolShape1 $clientSideTool
     */
    public function withClientSideTool(
        ClientSideTool\ClientSideTool|array $clientSideTool,
    ): self {
        $self = clone $this;
        $self['clientSideTool'] = $clientSideTool;

        return $self;
    }

    /**
     * @param 'client_side_tool' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
