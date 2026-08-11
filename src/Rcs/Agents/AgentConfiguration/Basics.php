<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents\AgentConfiguration;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Rcs\Agents\AgentConfiguration\Basics\UnionMember0;
use Telnyx\Rcs\Agents\AgentConfiguration\Basics\UnionMember1;
use Telnyx\Rcs\Agents\AgentConfiguration\Basics\UnionMember2;

/**
 * Basic agent identity and contact information. At least one complete phone, website, or email contact is required.
 *
 * @phpstan-import-type UnionMember0Shape from \Telnyx\Rcs\Agents\AgentConfiguration\Basics\UnionMember0
 * @phpstan-import-type UnionMember1Shape from \Telnyx\Rcs\Agents\AgentConfiguration\Basics\UnionMember1
 * @phpstan-import-type UnionMember2Shape from \Telnyx\Rcs\Agents\AgentConfiguration\Basics\UnionMember2
 *
 * @phpstan-type BasicsVariants = UnionMember0|UnionMember1|UnionMember2
 * @phpstan-type BasicsShape = BasicsVariants|UnionMember0Shape|UnionMember1Shape|UnionMember2Shape
 */
final class Basics implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [UnionMember0::class, UnionMember1::class, UnionMember2::class];
    }
}
