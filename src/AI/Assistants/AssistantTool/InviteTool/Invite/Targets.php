<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InviteTool\Invite;

use Telnyx\AI\Assistants\AssistantTool\InviteTool\Invite\Targets\UnionMember0;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;

/**
 * The different possible targets of the invite. The assistant will be able to choose one of the targets to invite to the call. This can also be a dynamic variable string like `{{ targets }}` where `targets` is returned by the dynamic variables webhook and resolves to an array of target objects at runtime. If omitted or null, the invite tool can still be configured and targets may be supplied dynamically at runtime.
 *
 * @phpstan-import-type UnionMember0Shape from \Telnyx\AI\Assistants\AssistantTool\InviteTool\Invite\Targets\UnionMember0
 *
 * @phpstan-type TargetsVariants = string|list<UnionMember0>
 * @phpstan-type TargetsShape = TargetsVariants|list<UnionMember0Shape>
 */
final class Targets implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [new ListOf(UnionMember0::class), 'string'];
    }
}
