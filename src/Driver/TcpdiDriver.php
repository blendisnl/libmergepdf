<?php

declare(strict_types = 1);

namespace blendisnl\libmergepdf\Driver;

use blendisnl\libmergepdf\Exception;
use blendisnl\libmergepdf\Source\SourceInterface;
use blendisnl\libmergepdf\Tcpdi\Tcpdi;

/**
 *
 */
final class TcpdiDriver implements DriverInterface
{
    /**
     * @var Tcpdi
     */
    private $tcpdi;

    public function __construct(Tcpdi $tcpdi = null)
    {
        // TODO A stupid hack to hide deprecation notice
        @each($arr = []);

        $this->tcpdi = $tcpdi ?: new Tcpdi;
    }

    public function merge(SourceInterface ...$sources): string
    {
        $sourceName = '';

        try {
            $tcpdi = clone $this->tcpdi;

            foreach ($sources as $source) {
                $sourceName = $source->getName();
                $pageCount = $tcpdi->setSourceData($source->getContents());
                $pageNumbers = $source->getPages()->getPageNumbers() ?: range(1, $pageCount);

                foreach ($pageNumbers as $pageNr) {
                    $template = $tcpdi->importPage($pageNr);
                    $size = $tcpdi->getTemplateSize($template);
                    $tcpdi->SetPrintHeader(false);
                    $tcpdi->SetPrintFooter(false);
                    $tcpdi->AddPage(
                        $size['w'] > $size['h'] ? 'L' : 'P',
                        [$size['w'], $size['h']]
                    );
                    $tcpdi->useTemplate($template);
                }
            }

            return $tcpdi->Output('', 'S');
        } catch (\Exception $e) {
            throw new Exception("'{$e->getMessage()}' in '$sourceName'", 0, $e);
        }
    }
}
