import PageContentBlock, { PageContentBlockProps } from '@/components/elements/PageContentBlock';
import React from 'react';
import { ServerContext } from '@/state/server';

interface Props extends PageContentBlockProps {
    title: string;
}

const ServerContentBlock: React.FC<Props> = ({ title, children, ...props }) => {
    const name = ServerContext.useStoreState(state => state.server.data!.name);

    return (
        <PageContentBlock title={`${name} | ${title}`} {...props}>
            <img src="/assets/enigma_christmas/2.png" className="bell" alt="" />
            {children}
        </PageContentBlock>
    );
};

export default ServerContentBlock;
