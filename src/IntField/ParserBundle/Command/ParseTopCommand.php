<?php

namespace IntField\ParserBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use IntField\ParserBundle\Entity\AppleStore;

class ParseTopCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('parser:parse-top')
            ->setDescription('Parse Apple Store')
            ->addArgument('category', InputArgument::REQUIRED, 'category')
            ->addArgument('type', InputArgument::REQUIRED, 'type');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $base = 'https://itunes.apple.com/ru/rss';
        $moreBase = 'http://itunes.apple.com/ru/lookup?id=';
        $limit = 10;
        $category = $input->getArgument('category');
        $type = $input->getArgument('type');
        
        $url = $base.'/'.$type.'/limit='.$limit.'/genre='.$category.'/json';
        
        try {
            $data = json_decode(file_get_contents($url));
        } catch (Exception $e) {
            echo "error $e\n";
        }
        
        $container = $this->getContainer();
        $doctrine = $container->get('doctrine');
        $em = $doctrine->getManager();
        $repository = $em->getRepository('IntField\ParserBundle\Entity\AppleStore');
        
        foreach ($data->feed->entry as $row) {
            $id = $row->id->attributes->{'im:id'};
            
            $store = $repository->findByAppleId($id);
            
            if ($store === null) {
                $store = new AppleStore();
                $store->setAppleId($id);
            }
            
            $moreUrl = $moreBase.$id;
            
            try {
                $moreData = json_decode(file_get_contents($moreUrl));
            } catch (Exception $e) {
                echo "error $e\n";
            }
            
            echo $id."\n";
            
            $store->setRatingStar($moreData->results[0]->averageUserRating);
            $store->setRatingCount($moreData->results[0]->userRatingCount);
            $store->setPrice($moreData->results[0]->price);
            $store->setName($moreData->results[0]->trackName);
            $store->setDescription($moreData->results[0]->description);
            $store->setLanguage($moreData->results[0]->languageCodesISO2A);
            $store->setSeller($moreData->results[0]->sellerName);
            $store->setVersion($moreData->results[0]->version);
            $store->setUrl($moreData->results[0]->trackViewUrl);
            $store->setPlatformType($moreData->results[0]->supportedDevices);
            $store->setSize($moreData->results[0]->fileSizeBytes);
            
            $em->persist($store);
        }
        
        $em->flush();
    }
}