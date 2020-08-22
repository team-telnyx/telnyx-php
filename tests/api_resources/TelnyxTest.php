<?php

namespace Telnyx;

/**
 * @internal
 * @covers \Telnyx\Telnyx
 */
final class TelnyxTest extends \Telnyx\TestCase
{
    /** @var array */
    protected $orig;

    /**
     * @before
     */
    public function saveOriginalValues()
    {
        $this->orig = [
            'caBundlePath' => Telnyx::$caBundlePath,
        ];
    }

    /**
     * @after
     */
    public function restoreOriginalValues()
    {
        Telnyx::$caBundlePath = $this->orig['caBundlePath'];
    }

    public function testCABundlePathAccessors()
    {
        Telnyx::setCABundlePath('path/to/ca/bundle');
        static::assertSame('path/to/ca/bundle', Telnyx::getCABundlePath());
    }
}
